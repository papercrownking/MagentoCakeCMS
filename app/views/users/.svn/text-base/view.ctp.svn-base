<div class="columns">
<div class="side-col" id="page:left">
	<h3>User Information</h3>
	<ul id="customer_info_tabs" class="tabs">
		<li><a class="tab-item-link" href="#customer_main_info"><span>User View</span></a></li>

	</ul>
</div>
<div class="main-col" id="content">
	<div class="main-col-inner">
		<div id="messages">
		</div>
		<div class="content-header">
			<h3><?php echo $user['User']['first_name'].' '.$user['User']['last_name']; ?></h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="save-user" title="save user" type="button" class="scalable save" onclick="submitForm('UserEditForm');"> 
					<span><span><span>Save User</span></span></span>
				</button>		
			</p>
		</div>
		<form enctype="multipart/form-data" method="post" id="UserEditForm" action="/cmsv3/users/edit">
		<input type="hidden" name="data[User][id]" id="hiddenID" value="<?php  echo $user['User']['id']; ?>" />		
		<div class="entry-edit">
			<div id="customer_main_info">
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Account Information</h4></div>
					 <div class="fieldset">
						<div class="hor-scroll">
							<table cellspacing="0" class="form-list">
							<tr>
								<td class="label"><label for="Username">Username<span class="required">*</span></label></td>
                <td class="value"><input id="Username" name="data[User][username]" class="input-text" type="text" value="<?php echo $user['User']['username']; ?>"/></td>
							</tr>
							<tr>
								<td class="label"><label for="Firstname">First Name<span class="required">*</span></label></td>
                <td class="value"><input id="Firstname" name="data[User][first_name]" class="input-text" type="text" value="<?php echo $user['User']['first_name']; ?>"/></td>
							</tr>
							<tr>
								<td class="label"><label for="Lastname">Last Name<span class="required">*</span></label></td>
                <td class="value"><input id="Lastname" name="data[User][last_name]" class="input-text" type="text" value="<?php echo $user['User']['last_name']; ?>"/></td>
							</tr>
							<tr>
								<td class="label"><label for="Email">Email<span class="required">*</span></label></td>
                <td class="value"><input id="email" name="data[User][email]" class="input-text" type="text" value="<?php echo $user['User']['email']; ?>"/></td>
							</tr>
							<tr>
								<td class="label"><label for="Password">Password<span class="required">*</span></label></td>
                <td class="value"><input id="password" name="data[User][password]" class="input-text" type="password" value=""/></td>
							</tr>
							<tr>
								<td class="label"><label for="Group">User Group<span class="required">*</span></label></td>
								<td class="value"><?php  echo $form->input('User.group_id',array('type'=>'select','label'=>'','class'=>'required-entry select' ,'options'=>$userGroups,'value'=>$user['User']['group_id']));?></td>
						  </tr>
							<tr>
								<td class="label"><label for="Group">Active<span class="required">*</span></label></td>
								<td class="value"><?php  echo $form->input('User.active',array('type'=>'select','label'=>'','class'=>'required-entry select' ,'options'=>$YNValue,'value'=>$user['User']['active']));?></td>
						  </tr>
							<tr>
								<td class="label"><label for="Group">CMS Administrator<span class="required">*</span></label></td>
								<td class="value"><?php  echo $form->input('User.is_admin',array('type'=>'select','label'=>'','class'=>'required-entry select' ,'options'=>$YNValue,'value'=>$user['User']['is_admin']));?></td>
						  </tr>
						</table>
					</div>
					</div>
				</div>					
			</div>
			</form>
		</div>
	</div>
</div>
<div class="content-header-floating" style="display:none;">
	<div class="content-header">
			<h3><?php echo $data['Member']['FirstName'].' '.$data['Member']['Surname']; ?></h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="view-as-user" title="View Site As Customer" type="button" class="scalable go" onclick="location.href='http://www.foliosociety.com/1963?code=DUMMY<?php echo $data['Member']['MemberID']; ?>'" style="">
					<span><span><span>View Site As Customer</span></span></span>
				</button>	
				<button id="save-user" title="save customer" type="button" class="scalable save" onclick="submitForm('MemberEditForm');"> 
					<span><span><span>Save Customer</span></span></span>
				</button>		
			</p>
	</div>
</div>
</div>