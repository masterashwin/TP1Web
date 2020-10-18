<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PhotosProduits Controller
 *
 * @property \App\Model\Table\PhotosProduitsTable $PhotosProduits
 *
 * @method \App\Model\Entity\PhotosProduit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhotosProduitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Produits', 'Photos'],
        ];
        $photosProduits = $this->paginate($this->PhotosProduits);

        $this->set(compact('photosProduits'));
    }

    /**
     * View method
     *
     * @param string|null $id Photos Produit id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $photosProduit = $this->PhotosProduits->get($id, [
            'contain' => ['Produits', 'Photos'],
        ]);

        $this->set('photosProduit', $photosProduit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $photosProduit = $this->PhotosProduits->newEntity();
        if ($this->request->is('post')) {
            $photosProduit = $this->PhotosProduits->patchEntity($photosProduit, $this->request->getData());
            if ($this->PhotosProduits->save($photosProduit)) {
                $this->Flash->success(__('The photos produit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The photos produit could not be saved. Please, try again.'));
        }
        $produits = $this->PhotosProduits->Produits->find('list', ['limit' => 200]);
        $photos = $this->PhotosProduits->Photos->find('list', ['limit' => 200]);
        $this->set(compact('photosProduit', 'produits', 'photos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Photos Produit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $photosProduit = $this->PhotosProduits->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $photosProduit = $this->PhotosProduits->patchEntity($photosProduit, $this->request->getData());
            if ($this->PhotosProduits->save($photosProduit)) {
                $this->Flash->success(__('The photos produit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The photos produit could not be saved. Please, try again.'));
        }
        $produits = $this->PhotosProduits->Produits->find('list', ['limit' => 200]);
        $photos = $this->PhotosProduits->Photos->find('list', ['limit' => 200]);
        $this->set(compact('photosProduit', 'produits', 'photos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Photos Produit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $photosProduit = $this->PhotosProduits->get($id);
        if ($this->PhotosProduits->delete($photosProduit)) {
            $this->Flash->success(__('The photos produit has been deleted.'));
        } else {
            $this->Flash->error(__('The photos produit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
