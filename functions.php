<?php
function showToasts() {
    echo "
            <div style='style='position: absolute; top:50vh; left:80vh'>  
                <div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>  
                    <div class='toast-header' data-delay='10000'>
                        <strong class='mr-auto text-primary'>Toast Header</strong>
                        <small class='text-muted'>5 mins ago</small>
                        <button type='button' class='ml-2 mb-1 close' data-dismiss='toast'>&times;</button>
                        </div>
                        <div class='toast-body'>
                        ".$displayMsg."
                    </div>
                </div>
            </div>
        ";
  }
  
  
?>