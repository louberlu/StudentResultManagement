<?php
class EtudiantsController extends AppController {

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
				$this->Session->setFlash('Erreur dans l\'ajout de l\étudiant.');
			}	
		}
	}
	
	public function liste()
	{
		$result = $this->Personne->find('all');
		$this->set('liste_etudiants', $result);
	}
}
?>