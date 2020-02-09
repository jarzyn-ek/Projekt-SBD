<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Settlements Controller
 *
 * @property \App\Model\Table\SettlementsTable $Settlements
 *
 * @method \App\Model\Entity\Settlement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SettlementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contracts', 'Budgets'],
        ];

        $settlements = $this->paginate($this->Settlements);

        $this->set(compact('settlements'));
    }

    /**
     * View method
     *
     * @param string|null $id Settlement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $settlement = $this->Settlements->get($id, [
            'contain' => ['Contracts', 'Budgets'],
        ]);

        $this->set('settlement', $settlement);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $settlement = $this->Settlements->newEntity();
        if ($this->request->is('post')) {
            $settlement = $this->Settlements->patchEntity($settlement, $this->request->getData());
            if ($this->Settlements->save($settlement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Settlement'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Settlement'));
        }
        $contracts = $this->Settlements->Contracts->find('list', ['limit' => 200]);
        $budgets = $this->Settlements->Budgets->find('list', ['limit' => 200]);
        $this->set(compact('settlement', 'contracts', 'budgets'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Settlement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $settlement = $this->Settlements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $settlement = $this->Settlements->patchEntity($settlement, $this->request->getData());
            if ($this->Settlements->save($settlement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Settlement'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Settlement'));
        }
        $contracts = $this->Settlements->Contracts->find('list', ['limit' => 200]);
        $budgets = $this->Settlements->Budgets->find('list', ['limit' => 200]);
        $this->set(compact('settlement', 'contracts', 'budgets'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Settlement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $settlement = $this->Settlements->get($id);
        if ($this->Settlements->delete($settlement)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Settlement'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Settlement'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
