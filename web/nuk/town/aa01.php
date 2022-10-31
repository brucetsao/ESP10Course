<form>
<input type="checkbox" onclick="CheckAll(this,1)">全選<br>
<input type="checkbox" name="ck1" value="1" group="1"><br>
<input type="checkbox" name="ck2" value="2" group="1"><br>
<input type="checkbox" name="ck3" value="3" group="1"><br>
<input type="checkbox" name="ck4" value="4" group="1"><br>
<input type="checkbox" name="ck5" value="5" group="1"><br>
-----------------------------------------------------<br>
<input type="checkbox" onclick="CheckAll(this,2)">全選<br>
<input type="checkbox" name="ckBryan" value="1" group="2"><br>
<input type="checkbox" name="ckDavid" value="2" group="2"><br>
<input type="checkbox" name="ckKevin" value="3" group="2"><br>
<input type="checkbox" name="ckMary" value="4" group="2"><br>
<input type="checkbox" name="ckSabrina" value="5" group="2"><br>
</form>
<script language="JavaScript">
function CheckAll(ckAll,group) {
 var e = document.forms[0].elements;
 for (var i=0;i<e.length;i++)
  if (e[i].type == "checkbox" && e[i].group == group)
   e[i].checked = ckAll.checked;
}
</script>
