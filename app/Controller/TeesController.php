<?php
class TeesController extends AppController {

	public $helpers = array('Js' => array('Jquery'));
	public $components = array('RequestHandler');
	
	function _teeFilter() {
		$this->Tee->recursive = -1;
		$colors = $this->Tee->find('list', array(
			'fields' => array('color', 'color')
		));
		$colors = array_unique($colors);

		$filter = array(
			'gender' => 'Alla',
			'color' => $colors,
			'price' => array(
				'intervall1' => 'intervall1',
				'intervall2' => 'intervall2',
				'intervall3' => 'intervall3',
				'intervall4' => 'intervall4'
			)
		);
		$gender = 'Alla';
		$genderCondition = array();
		$colorCondition = array();
		$priceCondition = array();
		$sizeCondition = array();

		if ($this->request->is('post')) {
			$filter = $this->request->data;

			if($filter['gender'] != 'Alla'){
				$genderCondition['Tee.sex'] = $filter['gender'];
			}

			if($filter['color'] != null){
				foreach ($filter['color'] as $value){
					$colorCondition['OR'][]['Tee.color'] = $filter['color'];
				}
				unset ($value);
			}

			if($filter['price'] != null){
				if(isset($filter['price']['intervall1'])){
					$priceCondition['OR'][]['Tee.price BETWEEN ? AND ?'] = array(0,99);
				}
				if(isset($filter['price']['intervall2'])){
					$priceCondition['OR'][]['Tee.price BETWEEN ? AND ?'] = array(100,199);
				}
				if(isset($filter['price']['intervall3'])){
					$priceCondition['OR'][]['Tee.price BETWEEN ? AND ?'] = array(200,299);
				}
				if(isset($filter['price']['intervall4'])){
					$priceCondition['OR'][]['Tee.price >'] = 299;
				}
			}
		}

		$tees = $this->Tee->find('all', array(
			'conditions' => array(
				$genderCondition,
				$colorCondition,
				$priceCondition,
				$sizeCondition
			)
		));
		
		$this->set('tees', $tees);
		$this->set('colors', $colors);
		$this->set('filter', $filter);
	}
	
	public function index() {
		$this->_teeFilter();
		
		$this->Tee->recursive = -1;
		$tmp = $this->Tee->find('all');
		$dailyTees = array();
		for ($x = 0; $x <= 2; $x++):
			mt_srand(date("Ymd")*3 + $x);
			$r = mt_rand(0, count($tmp)-1);
			$dailyTees[] = $tmp[$r];

			unset($tmp[$r]);
			$tmp = array_values($tmp);
		endfor;

		$this->set('dailyTees', $dailyTees);
	}

	public function view($id = null) {
	    if (!$id) {
            throw new NotFoundException(__('Tyvärr'));
        }
		
		$this->Tee->recursive = -1;
		$tee = $this->Tee->findById($id);
		if (!$tee) {
            throw new NotFoundException(__('Tyvärr'));
        }
		
		$inventory = ClassRegistry::init('InventoryItem');
		$inventory->recursive = -1;
		$inventoryItems = $inventory->find('list', array(
			'conditions' => array(
				'InventoryItem.tee_id' => $id,
				'InventoryItem.amount >' => 0
			),
			'fields' => array('size')
		));
		
		$tee['Size'] = $inventoryItems;
		$this->set('tee', $tee);
	}

	public function add_to_cart(){
		$id = $this->request->data['id'];
		$size = $this->request->data['size'];

		if (!$id || !$size) {
			throw new NotFoundException(__('Kunde inte lägga till varan i varukorgen'));
		}

		$this->Tee->recursive = -1;
		$tee = $this->Tee->findById($id);

		if (!$tee){
			throw new NotFoundException(__('Kunde inte lägga till varan i varukorgen'));
		}

		$amount = 0;

		if ($this->Session->check('Cart.'.$id)){
			if ($this->Session->check('Cart.'.$id.'.sizes.'.$size)){
				$amount = $this->Session->read('Cart.'.$id.'.sizes.'.$size.'.amount');
			}
		} else {
			$this->Session->write('Cart.'.$id, $tee);
		}
		
		$price = floor($tee['Tee']['price']*(100 - $tee['Tee']['discount'])/100);
		$orderItem = array('tee_id' => $id, 'size' => $size, 'amount' => $amount + 1, 'price' => $price);
		$this->Session->write('Cart.'.$id.'.sizes.'.$size, $orderItem);
		$this->redirect(array('controller' => 'tees', 'action' => 'view', $id));
	}

	public function reallocate() {
		$this->Tee->query('TRUNCATE inventory_items;');
		
		$tees = $this->Tee->find('all');
		$sizes = array ('XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL');
		
		$inventory = "INSERT INTO inventory_items(tee_id, size, amount) VALUES";
		$i = 0;
		foreach ($tees as $tee) {
			$id = $tee['Tee']['id'];
			foreach ($sizes as $size) {
				if ($i > 0) {
					$inventory .= ', ';
				}
				
				$inventory .= " ('{$id}', '{$size}', '15')";
				$i++;
			}
		}
		
		$this->Tee->query($inventory);
	}
	
	public function filter() {
		$this->_teeFilter();
	}
}
?>