<?php

// src/Controller/ArticlesController.php

namespace App\Controller;

class ArticlesController extends AppController {

    /*public function isAuthorized($user) {
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

        // Check that the article belongs to the current user.
        $article = $this->Articles->findBySlug($slug)->first();

        return $article->user_id === $user['id'];
    }*/

    public function index() {
        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->Articles->find(
            /////////////'all', [
            /////////////'contain' => ['Users'],
        ///////////////]
    ));
        $this->set(compact('articles'));
    }

    // Add to existing src/Controller/ArticlesController.php file

    public function view($slug = null) {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
////        debug($article);
//       die();
        $this->set(compact('article'));
    }

    public function add() {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.
            //////////////$article->$this->Auth->user('id');
            $article->user_id = 1;

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);
    }

    // in src/Controller/ArticlesController.php
// Add the following method.

    public function edit($slug) {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData()
                /*, [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]*/
            );
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your article.'));
        }

        $this->set('article', $article);
    }

   public function delete($slug) {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The {0} article has been deleted.', $article->title));
            return $this->redirect(['action' => 'index']);
        }
    }

}
