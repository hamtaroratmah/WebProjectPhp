<form action="index.php?action=admin_ideas" method="post">
    <table id="admin_ideas_table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Auteur</th>
                <th><input type="submit" name="status" value="statut"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ideasTable as $i => $idea){?>
                <input type="hidden" name="ideaStatus[<?php echo $i ?>][idea_id]" value="<?php echo $idea->getIdIdea()?>" />
                <tr>
                    <td>
                        <?php
                        echo $idea->getTitle();
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $idea->getDescription();
                        ?>
                    </td>

                    <td>
                        <?php echo $this->_db->getAuthor($idea->getMemberId()); ?>
                    </td>
                    <td>
                        <?php if(strcmp($idea->getStatus(),"closed")==0){ ?>
                            <select name="ideaStatus[<?php echo $i ?>][status_select]">
                                <option value="closed">fermée</option>
                            </select>
                        <?php }elseif(strcmp($idea->getStatus(),"submitted")==0){ ?>
                            <select name="ideaStatus[<?php echo $i ?>][status_select]">
                                <option value="submitted">soumise</option>
                                <option value="accepted">acceptée</option>
                                <option value="refused">refusée</option>
                            </select>
                        <?php }elseif(strcmp($idea->getStatus(),"accepted")==0){ ?>
                            <select name="ideaStatus[<?php echo $i ?>][status_select]">
                                <option value="accepted">acceptée</option>
                                <option value="refused">refusée</option>
                                <option value="closed">fermée</option>
                            </select>
                        <?php }elseif(strcmp($idea->getStatus(),"refused")==0){ ?>
                            <select name="ideaStatus[<?php echo $i ?>][status_select]">
                                <option value="refused">refusée</option>
                                <option value="accepted">acceptée</option>
                                <option value="closed">fermée</option>
                            </select>
                        <?php }?>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</form>
