<p>Bonjour toi</p>
<p><?php
    if(isset($_SESSION['username'])){
        foreach ($tableIdeas as $i => $idea){
            echo $idea->getDescription();
        }
    }

    ?></p>

