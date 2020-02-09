<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Budgets Controller
 *
 * @property \App\Model\Table\BudgetsTable $Budgets
 *
 * @method \App\Model\Entity\Budget[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BudgetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Budgets->find('all', [
            'contain' => [
                'Projects',
                'Departments'
            ]
        ]);

        if (!is_null($query_search = $this->request->getQuery('table_search')) && $query_search != '') {
            $query = $query->where([
                'OR' => [
                    'Projects.name LIKE' => '%' . $query_search . '%',
                    'Departments.name LIKE' => '%' . $query_search . '%'
                ]
            ]);
        }
        
        $budgets = $this->paginate($query);

        $this->set(compact('budgets'));
    }

    /**
     * View method
     *
     * @param string|null $id Budget id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $budget = $this->Budgets->get($id, [
            'contain' => ['Projects', 'Departments', 'Settlements'],
        ]);

        $this->set('budget', $budget);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $budget = $this->Budgets->newEntity();
        if ($this->request->is('post')) {
            $budget = $this->Budgets->patchEntity($budget, $this->request->getData());
            if ($this->Budgets->save($budget)) {
                $this->Flash->success(__('The {0} has been saved.', 'Budget'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Budget'));
        }
        $projects = $this->Budgets->Projects->find('list', ['limit' => 200]);
        $departments = $this->Budgets->Departments->find('list', ['limit' => 200]);
        $this->set(compact('budget', 'projects', 'departments'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Budget id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $budget = $this->Budgets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $budget = $this->Budgets->patchEntity($budget, $this->request->getData());
            if ($this->Budgets->save($budget)) {
                $this->Flash->success(__('The {0} has been saved.', 'Budget'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Budget'));
        }
        $projects = $this->Budgets->Projects->find('list', ['limit' => 200]);
        $departments = $this->Budgets->Departments->find('list', ['limit' => 200]);
        $this->set(compact('budget', 'projects', 'departments'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Budget id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $budget = $this->Budgets->get($id, [
            'contain' => [
                'Settlements'
            ]
        ]);

        if ($budget->settlements) {
            $this->Flash->error(__('The {0} could not be deleted. There are related {1} in database', 'Budget', 'Settlements'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Budgets->delete($budget)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Budget'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Budget'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
