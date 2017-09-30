/**
 * 
 */

function checkmeau()
{
	var m_name=document.getElementById('m_name').value;
	var str="<label class='glyphicon glyphicon-remove'></label>";
	if(m_name=="")
		{
		    document.getElementById('show').style.display="block";
			document.getElementById('error').innerHTML=str+"  菜单名称必须填写";
		    return false;
		}
	return true;
}


function cfm()
{if(confirm('确定删除？'))
   {
	    return true;
	}else{return false;}

}



function checkmsg()
{
	var title=document.getElementById('title').value;
	var source=document.getElementById('source').value;
	var content=document.getElementById('content').value;
	var str="<label class='glyphicon glyphicon-remove'></label>";
	if(title=="")
		{
		    document.getElementById('show').style.display="block";
			document.getElementById('error').innerHTML=str+"  新闻标题必须填写";
		    return false;
		}
	if(source=="")
	{
		document.getElementById('show').style.display="block";
		document.getElementById('error').innerHTML=str+"  新闻来源必须填写";
		return false;
	}
	if(content=="")
	{
		document.getElementById('show').style.display="block";
		document.getElementById('error').innerHTML=str+"  新闻内容必须填写";
		return false;
	}
	return true;
}
function checkconfig()
{
	var sysname=document.getElementById('sysname').value;
	var keyword=document.getElementById('keyword').value;
	var discription=document.getElementById('description').value;
	var address=document.getElementById('address').value;
	var copy=document.getElementById('copy').value;
	var phone=document.getElementById('phone').value;
	var author=document.getElementById('author').value;
	var str="<label class='glyphicon glyphicon-remove'></label>";
	if(sysname=="")
	{
		document.getElementById('show').style.display="block";
		document.getElementById('error').innerHTML=str+"  系统名称必须填写";
		return false;
	}
	if(keyword=="")
	{
		document.getElementById('show').style.display="block";
		document.getElementById('error').innerHTML=str+"  关键字必须填写";
		return false;
	}
	if(description=="")
	{
		document.getElementById('show').style.display="block";
		document.getElementById('error').innerHTML=str+"  系统描述必须填写";
		return false;
	}
	if(address=="")
	{
		document.getElementById('show').style.display="block";
		document.getElementById('error').innerHTML=str+"  地址必须填写";
		return false;
	}
	if(copy=="")
	{
		document.getElementById('show').style.display="block";
		document.getElementById('error').innerHTML=str+"  系统版权必须填写";
		return false;
	}
	if(phone=="")
	{
		document.getElementById('show').style.display="block";
		document.getElementById('error').innerHTML=str+"  联系电话必须填写";
		return false;
	}
	if(author=="")
	{
		document.getElementById('show').style.display="block";
		document.getElementById('error').innerHTML=str+"  系统制作者必须填写";
		return false;
	}
	return true;
}


function checklogin()
{
	var user=document.getElementById('username').value;
	var pwd=document.getElementById('password').value;
	var str="<label class='glyphicon glyphicon-remove'></label>";
	if(user=="")
		{
		    document.getElementById('show').style.display="block";
		    //当user为空显示提示的盒子
			document.getElementById('error').innerHTML=str+" 用户名不能为空！";
			//定位     innerHTML属性可以在里面写标签  变量和字符串通过“+”连接
			return false;
		}
	if(pwd=="")
	{
		document.getElementById('show').style.display="block";
		document.getElementById('error').innerHTML=str+" 密码不能为空！";
		//定位     innerHTML属性可以在里面写标签  变量和字符串通过“+”连接
		return false;
	}
	return true;
}

/*function dataDel(var id)
{
   
    var xmlHttp = null;
    if(window.XMLHttpRequest){
        xmlHttp = new XMLHttpRequest();
    }else{
        xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlHttp.onreadystatechange=function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
           var row="row"+xmlHttp.responseText;
           deocument.getElementById(row).style.display="none;";
        }
    }
    xmlHttp.open('get','msg_del.php?id='+id,true);
    xmlHttp.send();	
}*/