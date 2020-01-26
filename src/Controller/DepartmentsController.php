<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Departments Controller
 *
 * @property \App\Model\Table\DepartmentsTable $Departments
 *
 * @method \App\Model\Entity\Department[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $departments = $this->paginate($this->Departments);

        $this->set(compact('departments'));
    }

    /**
     * View method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $department = $this->Departments->get($id, [
            'contain' => ['Companies', 'Budgets', 'Jobs', 'Staffs'],
        ]);

        $this->set('department', $department);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $department = $this->Departments->newEntity();
        if ($this->request->is('post')) {
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('The {0} has been saved.', 'Department'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Department'));
        }
        $companies = $this->Departments->Companies->find('list', ['limit' => 200]);
        $this->set(compact('department', 'companies'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $department = $this->Departments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('The {0} has been saved.', 'Department'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Department'));
        }
        $companies = $this->Departments->Companies->find('list', ['limit' => 200]);
        $this->set(compact('department', 'companies'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $department = $this->Departments->get($id, [
            'contain' => [
                'Staffs','Jobs','Budgets'
            ]
        ]);

        //dd($department);

        if ($department->staffs) {
            $this->Flash->error(__('The {0} could not be deleted. There are related {1} in database', 'Department', 'Staffs'));
            return $this->redirect(['action' => 'index']);
        }

        if ($department->jobs) {
            $this->Flash->error(__('The {0} could not be deleted. There are related {1} in database', 'Department', 'Jobs'));
            return $this->redirect(['action' => 'index']);
        }     

        if ($department->budgets) {
            $this->Flash->error(__('The {0} could not be deleted. There are related {1} in database', 'Department', 'Budgets'));
            return $this->redirect(['action' => 'index']);
        }   

        if ($this->Departments->delete($department)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Department'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Department'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
