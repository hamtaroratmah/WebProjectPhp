<form action="index.php?action=admin_members" method="post">
    <table id="tableMembers">
        <thead>
        <tr>
            <th>Username</th>
            <th>adresse mail</th>
            <th><input type="submit" name="admin" value="admin"></th>
            <th><input type="submit" name="disabled" value="disabled"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($membersTable as $i => $member){?>
                <input type="hidden" name="permissions[<?php echo $i ?>][member_id]" value="<?php echo $member->getId()?>" />
                <tr>
                    <td><?php echo $member->html_username()?></td>
                    <td><?php echo $member->html_mail()?></td>
                    <?php if($member->html_admin()==1){?>
                    <td><select name="permissions[<?php echo $i ?>][admin_select]">
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select></td>
                    <?php }else{?>
                        <td><select name="permissions[<?php echo $i ?>][admin_select]">
                                <option value="0">0</option>
                                <option value="1">1</option>
                            </select></td>
                    <?php }
                    if($member->html_disabled()==1){?>
                    <td><select name="permissions[<?php echo $i ?>][disabled_select]">
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select></td>
                    <?php }else{?>
                        <td><select name="permissions[<?php echo $i ?>][disabled_select]">
                                <option value="0">0</option>
                                <option value="1">1</option>
                            </select></td>
                    <?php }?>
                </tr>
            <?php }?>
        </tbody>
    </table>
</form>
