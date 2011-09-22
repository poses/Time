<?php
class UserGroupMembershipsController extends AppController {
	public function admin_create() {
		if(!empty($this->data)) {
			if($this->UserGroupMembership->save($this->data)) {
				if($this->params['url']['ext'] == 'json') {
					$this->UserGroupMembership->User->id = $this->data['UserGroupMembership']['user_id'];
					$this->set('response',array(
						'user' => array(
							'id' => $this->data['UserGroupMembership']['user_id'],
							'username' => $this->UserGroupMembership->User->field('username'),
							'rank' => $this->data['UserGroupMembership']['rank'],
						),
					));
				} else {
					$this->Session->setFlash('User Group Membership created!');

				}
			} else {
				$this->Session->setFlash('There was an error!');
			}
		}
		
		$userGroups = $this->UserGroupMembership->UserGroup->find('list',array());
		$this->set('userGroups',$userGroups);
		
		$users = $this->UserGroupMembership->User->find('list',array());
		$this->set('users',$users);
	}
}
