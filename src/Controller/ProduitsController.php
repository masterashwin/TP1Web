<?php

// src/Controller/ProduitsController.php

namespace App\Controller;

class ProduitsController extends AppController {

    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'tags'])) {
            return true;
        }

        // All other actions require a slug.
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        // Check that the produit belongs to the current user.
        $produit = $this->Produits->findBySlug($slug)->first();

        return $produit->user_id === $user['id'];
    }

    public function index() {
        $this->loadComponent('Paginator');
        $produits = $this->Paginator->paginate($this->Produits->find(
            'all', [
            'contain' => ['Users'],
        ]
    ));
        $this->set(compact('produits'));
    }

    // Add to existing src/Controller/ProduitsController.php file

    public function view($slug = null) {
        $produit = $this->Produits->findBySlug($slug)->firstOrFail();
////        debug($produit);
//       die();
        $this->set(compact('produit'));
    }

    public function add() {
        $produit = $this->Produits->newEntity();
        if ($this->request->is('post')) {
            $produit = $this->Produits->patchEntity($produit, $this->request->getData());

            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.
            $produit->$this->Auth->user('id');
            ////$produit->utilisateur_id = 1;

            if ($this->Produits->save($produit)) {
                $this->Flash->success(__('Your produit has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your produit.'));
        }
        $this->set('produit', $produit);
    }

    // in src/Controller/ProduitsController.php
// Add the following method.

    public function edit($slug) {
        $produit = $this->Produits->findBySlug($slug)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Produits->patchEntity($produit, $this->request->getData()
                , [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]
            );
            if ($this->Produits->save($produit)) {
                $this->Flash->success(__('Your produit has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your produit.'));
        }

        $this->set('produit', $produit);
    }

   public function delete($slug) {
        $this->request->allowMethod(['post', 'delete']);

        $produit = $this->Produits->findBySlug($slug)->firstOrFail();
        if ($this->Produits->delete($produit)) {
            $this->Flash->success(__('The {0} produit has been deleted.', $produit->nom));
            return $this->redirect(['action' => 'index']);
        }
    }

}
