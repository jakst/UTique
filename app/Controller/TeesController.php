<?php
class TeesController extends AppController {

	public function index() {
		$this->Tee->recursive = 0;
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
			),
			'size' => array(
				'xs' => 'xs',
				's' => 's',
				'm' => 'm',
				'l' => 'l',
				'xl' => 'xl',
				'xxl' => 'xxl',
				'xxxl' => 'xxxl'
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

			// if($filter['size'] != null){

				// foreach ($filter['size'] as $value){
					// $sizeCondition['OR'][]['Item.size'] = $filter['size'];
				// }
				// unset ($value);
			// }


		}

		$tees = $this->Tee->find('all', array(
			'conditions' => array(
				$genderCondition,
				$colorCondition,
				$priceCondition,
				$sizeCondition
			)
		));

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
		$this->set('tees', $tees);
		$this->set('colors', $colors);
		$this->set('filter', $filter);
	}

	public function view($id = null) {
	    if (!$id) {
            throw new NotFoundException(__('Tyvärr'));
        }
		
		$inventory = ClassRegistry::init('InventoryItem');
		$inventory->recursive = -1;
		$data['InventoryItem'] = Hash::combine($inventory->find('all'), '{n}.InventoryItem.id', '{n}.InventoryItem');
		
		$tee = $this->Tee->findById($id);	
		$tee['Item'] = Hash::combine($tee['Item'], '{n}.id', '{n}');
		
		foreach ($tee['Item'] as $item):	
			if ($data['InventoryItem'][$item['id']]['amount'] == 0){
				unset($tee['Item'][$item['id']]);
			}
		endforeach;
        
		if (!$tee) {
            throw new NotFoundException(__('Tyvärr'));
        }

		$this->set('tee', $tee);
	}

	public function add_to_cart(){
		$id = $this->request->data['id'];
		$sizeId = $this->request->data['size'];

		if (!$id || !$sizeId) {
			throw new NotFoundException(__('Kunde inte lägga till varan i varukorgen'));
		}

		$this->Tee->recursive = -1;
		$tee = $this->Tee->findById($id);

		$expl = explode('-', $sizeId);
		$sId = $expl[0];
		$size = $expl[1];

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
		
		$price = $tee['Tee']['price']*(100-$tee['Tee']['discount'])/100;
		$orderItem = array('item_id' => $sId, 'amount' => $amount + 1, 'price' => $price);
		$this->Session->write('Cart.'.$id.'.sizes.'.$size, $orderItem);
		$this->redirect(array('controller' => 'tees', 'action' => 'view', $id));
	}

	public function reallocate() {
		$this->Tee->query('TRUNCATE items;');
		$this->Tee->query('TRUNCATE inventory_items;');
		
		$tees = $this->Tee->find('all');
		$sizes = array ('XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL');
		
		$items = "INSERT INTO items(id, tee_id, size) VALUES";
		$inventory = "INSERT INTO inventory_items(item_id, amount) VALUES";
		
		$id = 1;
		foreach ($tees as $tee) {
			$tee_id = $tee['Tee']['id'];
			foreach ($sizes as $size) {
				if ($id > 1) {
					$items .= ',';
					$inventory .= ', ';
				}
				
				$items .= " ('{$id}', '{$tee_id}', '{$size}')";
				$inventory .= " ('{$id}', '15')";
				$id++;
			}
		}
		
		$this->Tee->query($items);
		$this->Tee->query($inventory);
	}
}
?>