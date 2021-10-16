<form method="post" action="index.php?action=home">
    <p>
        <label for="status"Statut </label><br />
        <select name="status" id="status">
            <option value="submitted" selected>Submitted</option>
            <option value="accepted">Accepted</option>
            <option value="refused">Refused</option>
            <option value="closed">Closed</option>
        </select>
        <input type="submit" name="submit" value="Trier">
    </p>
</form>

<?php foreach ($table as $i => $idea) {?>
    <table id="ideas_table">
    <tbody>
        

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

 
