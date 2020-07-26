<?php 

function inputElement($icon , $placeholder , $name , $value){
    $ele = "
        
                <div class=\"input-group mb-3\">
                    <div class=\"input-group-prepend\">
                      <span class=\"input-group-text bg-warning\">$icon</i></span>
                    </div>
                    <input type=\"text\" class=\"form-control\" placeholder='$placeholder' name='$name' value = '$value'>
                  </div>
    
    ";
    echo $ele;
}

function buttonElement($btnid, $styleclass, $text, $name, $attr){
    
    $btn = "
        <button name='$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
    ";
    echo $btn;
}