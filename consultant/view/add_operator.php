<?php
header("Content-type: text/html; charset=UTF-8"); ?>
<h1>Добавить новых операторов!!!</h1><br/>
<form action="http://online-consultant/consultant/class/add_operator.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="subm" value="1">
  <table>
    <tbody>
      <tr>
        <td valign="top">Имя оператора:</td>
        <td width="20"> </td>
        <td>
          <input type="text" name="operator_name" value="" style="width:300px;">
          <br>
          <font style="font-size:12px;color:#808080;">Имя оператора, которое будут видеть ваши клиенты</font>
        </td>
      </tr>
      <tr>
        <td valign="top">Фамилия оператора:</td>
        <td width="20"> </td>
        <td>
          <input type="text" name="operator_surname" value="" style="width:300px;">
          <br>
          <font style="font-size:12px;color:#808080;">Фамилия оператора, которое будут видеть ваши клиенты</font>
        </td>
      </tr>
      <tr>
        <td valign="top">Отдел оператора:</td>
        <td width="20"> </td>
        <td>
          <input type="text" name="operator_otdel" value="" style="width:300px;">
          <br>
          <font style="font-size:12px;color:#808080;">Введите отдел этого оператора</font>
        </td>
      </tr>
      <tr>
        <td valign="top">Текст приветствия:</td>
        <td width="20"> </td>
        <td>
          <input type="text" name="operator_mess" value="" style="width:300px;">
          <br>
          <font style="font-size:12px;color:#808080;">Введите текст приветствия дял оператора</font>
        </td>
      </tr>
      <tr>
        <td valign="top">Логин:</td>
        <td width="20"> </td>
        <td>
          <input type="text" name="operator_login" value="" style="width:200px;">
          <br>
          <font style="font-size:12px;color:#808080;">От 3 до 16 символов. Только латинские буквы и цифры.</font>
        </td>
      </tr>
      <tr>
        <td valign="top">Пароль:</td>
        <td width="20"> </td>
        <td>
          <input type="password" name="operator_pass" value="" style="width:100px;">
          <br>
          <font style="font-size:12px;color:#808080;">От 6 до 18 символов</font>
        </td>
      </tr>
      <tr>
        <td valign="top">Пароль (ещё раз):</td>
        <td width="20"> </td>
        <td>
          <input type="password" name="operator_pass_again" value="" style="width:100px;">
          <br>
          <font style="font-size:12px;color:#808080;">Введите пароль ещё раз</font>
        </td>
      </tr>
      <tr>
        <td valign="top">Фотография:</td>
        <td width="20"> </td>
        <td>
          <input type="file" name="operator_photo">
          <br>
          <font style="font-size:12px;color:#808080;">Поддерживаются форматы JPG,GIF,PNG</font>
        </td>
      </tr>

    </tbody>
  </table>
  <input style="padding: 4px" type="submit" value="добавить" name="add_operator">
</form>