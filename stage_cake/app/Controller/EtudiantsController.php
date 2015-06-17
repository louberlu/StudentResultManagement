<?php
/**
 * Controller du model Etudiant
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Karen Fifi NKILI OBELE
 * @author        Jonathan Brachet
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
 
 /**
 * Classe du Controller EtudiantsController
 *
 *
 * @author        Karen Fifi NKILI OBELE
 * @author        Jonathan Brachet
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
 
class EtudiantsController extends AppController {
   
   public function beforeFilter(){
      $this->loadModel('User');
      $this->loadModel('EtudiantsUe');
      $this->loadModel('EtudiantsSemestre');
   }

	public function add()
	{
		if ($this->request->is('post'))
		{
			if ($this->Personne->save($this->request->data))
			{
				$this->Session->setFlash('Ajout de l\'étudiant effectué.');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Erreur dans l\'ajout de l\'étudiant.');
			}	
		}
	}
	
	public function edit($id=null)
	{ //à refaire en fonction de l'action add
	   if (!$this->request->is('put'))
	   {
	      $this->request->data['Etudiant'] = $this->Etudiant->read(null, $id);
	      $this->request->data['User'] = $this->User->read(null, $id);
	      $this->request->data['EtudiantsUe'] = $this->EtudiantsUe->read(null, $id);
	   }
	   else
	   {
	      if ($this->Etudiant->saveAssociated($data, array('deep' => true)))
	      {
	         $this->Session->setFlash('Modification des informations de l\'étudiant affectuée.');
            $this->redirect(array('action'=>'liste'));
	      }
	      else
	      {
	         $this->Session->setFlash('Erreur dans la modification des informations de l\'étudiant affectuée.');
	      }
	   }
	}
	
	public function liste()
	{
		$result = $this->Etudiant->find('all');
		$this->set('liste_etudiants', $result);
	}
	
	public function delete($id = null)
	{
	   if($this->Etudiant->delete($id) & $this->User->delete($id))
	   {
	      $this->Session->setFlash('Etudiant '.$id.' supprimé.');
	      $this->redirect(array('action'=>'liste'));
	   }
	   else
	   {
	      $this->Session->setFlash('Etudiant '.$id.' non supprimé.');
	      $this->redirect(array('action'=>'liste'));
	   }
	}
}
?>
