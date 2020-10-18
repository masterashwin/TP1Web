<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProduitsTypes Controller
 *
 * @property \App\Model\Table\ProduitsTypesTable $ProduitsTypes
 *
 * @method \App\Model\Entity\ProduitsType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProduitsTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Produits', 'Types'],
        ];
        $produitsTypes = $this->paginate($this->ProduitsTypes);

        $this->set(compact('produitsTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Produits Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produitsType = $this->ProduitsTypes->get($id, [
            'contain' => ['Produits', 'Types'],
        ]);

        $this->set('produitsType', $produitsType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produitsType = $this->ProduitsTypes->newEntity();
        if ($this->request->is('post')) {
            $produitsType = $this->ProduitsTypes->patchEntity($produitsType, $this->request->getData());
            if ($this->ProduitsTypes->save($produitsType)) {
                $this->Flash->success(__('The produits type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produits type could not be saved. Please, try again.'));
        }
        $produits = $this->ProduitsTypes->Produits->find('list', ['limit' => 200]);
        $types = $this->ProduitsTypes->Types->find('list', ['limit' => 200]);
        $this->set(compact('produitsType', 'produits', 'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produits Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produitsType = $this->ProduitsTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produitsType = $this->ProduitsTypes->patchEntity($produitsType, $this->request->getData());
            if ($this->ProduitsTypes->save($produitsType)) {
                $this->Flash->success(__('The produits type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produits type could not be saved. Please, try again.'));
        }
        $produits = $this->ProduitsTypes->Produits->find('list', ['limit' => 200]);
        $types = $this->ProduitsTypes->Types->find('list', ['limit' => 200]);
        $this->set(compact('produitsType', 'produits', 'types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produits Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produitsType = $this->ProduitsTypes->get($id);
        if ($this->ProduitsTypes->delete($produitsType)) {
            $this->Flash->success(__('The produits type has been deleted.'));
        } else {
            $this->Flash->error(__('The produits type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
