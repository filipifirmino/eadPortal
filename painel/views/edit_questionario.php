<h1>Editar Questionario</h1>
   <?
   
if(array_key_exists("pergunta",$aula)){
    
}else{
    $aula['pergunta'] = '';
    $aula['op1'] = '';
    $aula['op2'] = '';
    $aula['op3'] = '';
    $aula['op4'] = '';
    $aula['op5'] = '';
    $aula['resposta'] = '';

    #echo "<h1 style='color:red;'>Ainda não há perguntas neste questionario.</h1>";

   # exit;   
}
?>
<form method="POST" class="edit_quest">


    Pergunta:
    <input type = 'text'name="pergunta" value="<?echo $aula['pergunta']?>">
    <br>
    Letra A :<input type="text" name="op1" id=""  value="<?echo $aula['op1'];?>"><br/>
    Letra B :<input type="text" name="op2" id=""  value="<?echo $aula['op2'];?>"><br/>
    Letra C :<input type="text" name="op3" id=""  value="<?echo $aula['op3'];?>"><br/>
    Letra D :<input type="text" name="op4" id=""  value="<?echo $aula['op4'];?>"><br/>
    Letra E :<input type="text" name="op5" id=""  value="<?echo $aula['op5'];?>"><br/>
    
    Resposta :
    <select name="resposta">
        <option value="op1" <?echo ($aula['resposta']=='op1')?'selected="selected"':'';?>>Letra A</option>
        <option value="op2" <?echo ($aula['resposta']=='op2')?'selected="selected"':'';?>>Letra B</option>
        <option value="op3" <?echo ($aula['resposta']=='op3')?'selected="selected"':'';?>>Letra C</option>
        <option value="op4" <?echo ($aula['resposta']=='op4')?'selected="selected"':'';?>>Letra D</option>
        <option value="op5" <?echo ($aula['resposta']=='op5')?'selected="selected"':'';?>>Letra E</option>
    </select>

    <br>
   


<input type="submit" value="Salvar">
</form>
