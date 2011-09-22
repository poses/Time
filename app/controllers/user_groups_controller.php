<?php
class UserGroupsController extends AppController {
	
    var $name = 'UserGroups';
	
	public function api_join($id=null) {
		$response = false;
		$userGroup = $this->UserGroup->find('first',array(
			'conditions' => array(
				'UserGroup.id' => $id,
			),
		));
		
		if($userGroup) {
			$parentUserGroupMemberRank = 0;
			foreach($this->Session->read('Auth.User.UserGroups') as $_userGroup) {
				if($_userGroup['id'] == $userGroup['UserGroup']['parent_user_group_id']) {
					$parentUserGroupMemberRank = $_userGroup['rank'];
				}
			}
			
			if($userGroup['UserGroup']['is_private'] && $parentUserGroupMemberRank >= 50 || $this->Session->read('Auth.User.isSuperAdmin')) {
				if(isset($this->data['User']['id'])) {
					$userToAdd = $this->data['User']['id'];
				}
			} else {
				$userToAdd = $this->Session->read('Auth.User.id');
			}
			
			if(isset($userToAdd)) {
				$this->UserGroup->UserGroupMembership->create();
				$userGroupMembership = array(
					'user_id' => $userToAdd,
					'user_group_id' => $id,
					'rank' => (isset($this->data['User']['rank']) && $parentUserGroupMemberRank > $this->data['User']['rank'] ? $this->data['User']['rank'] : 0 ),
				);
				if($this->UserGroup->UserGroupMembership->save($userGroupMembership)) {
					$response = array(
						'status' => array(
							'code' => 200,
							'text' => 'User added to user group',
						),
					);
				}
			}
		}
		$this->set('response',$response);
	}
	
	public function api_search() {
		$conditons = array();
		if(!empty($this->params['url']['id'])) {
			$conditions['UserGroup.id'] = (int)$this->params['url']['id'];
		} else if(!empty($this->params['url']['name'])) {
			$conditions['UserGroup.name LIKE'] = $this->params['url']['name'] . '%';
		}
		if(!empty($conditions)) {
			$userGroups = $this->UserGroup->find('all',array(
				'conditions' => $conditions,
				'fields' => array(
					'id',
					'parent_user_group_id',
					'name',
					'description',
					'is_private',
					'created',
				),
			));
			
			foreach($userGroups as &$userGroup) {
				$userGroup = $userGroup['UserGroup'];
			}
			$this->set('response',$userGroups);
		} else {
			$this->set('response',array());
		}
	}
	
	public function admin_index() {
		$this->paginate = array(
			'UserGroup' => array(
				'contain' => array(
					'UserGroupMembership',
					'Organization',
				),
			),
		);
		$userGroups = $this->paginate('UserGroup');
		$this->set('userGroups',$userGroups);
	}
	
	public function admin_edit($id=null) {
		if(!empty($this->data)) {
			if($this->UserGroup->save($this->data)) {
				$this->Session->setFlash('User Group saved!');
			} else {
				$this->Session->setFlash('There was an error');
			}
		} else {
			$this->data = $this->UserGroup->find('first',array(
				'conditions' => array(
					'UserGroup.id' => $id,
				),
			));
		}
		
		$userGroupMemberships = $this->UserGroup->UserGroupMembership->find('all',array(
			'conditions' => array(
				'UserGroupMembership.user_group_id' => $this->data['UserGroup']['id'],
			),
			'contain' => array(
				'User',
			),
		));
		$this->set('userGroupMemberships',$userGroupMemberships);
		
		$organizations = $this->UserGroup->Organization->find('all',array(
			'conditions' => array(
				'Organization.user_group_id' => $this->data['UserGroup']['id'],
			),
		));
		$this->set('organizations',$organizations);
	}
}
?>
