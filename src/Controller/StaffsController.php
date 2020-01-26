<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Staffs Controller
 *
 * @property \App\Model\Table\StaffsTable $Staffs
 *
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StaffsController extends AppController
{
    public function initialize() {
        parent::initialize();

        $this->loadModel('Departments');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Departments'],
        // ];
        $staffs = $this->paginate($this->Staffs);

        $this->set(compact('staffs'));
    }

    /**
     * View method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => ['Departments', 'Workers'],
        ]);

        $this->set('staff', $staff);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staff = $this->Staffs->newEntity();
        if ($this->request->is('post')) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->getData());
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The {0} has been saved.', 'Staff'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Staff'));
        }
        $departments = $this->Staffs->Departments->find('list', ['limit' => 200]);

        $this->set(compact('staff', 'departments'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->getData());
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The {0} has been saved.', 'Staff'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Staff'));
        }
        $departments = $this->Staffs->Departments->find('list', ['limit' => 200]);
        $this->set(compact('staff', 'departments'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        // $staff = $this->Staffs->get($id);

        $staff = $this->Staffs->get($id, [
            'contain' => [
                'Workers'
            ]
        ]);

        if ($staff->workers) {
            $this->Flash->error(__('The {0} could not be deleted. There are related {1} in database', 'Staff', 'Workers'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Staffs->delete($staff)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Staff'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Staff'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
