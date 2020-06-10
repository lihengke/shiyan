<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>login</title>
<script type="text/javascript">
	function change(obj){
		obj.src="code.php?a="+Math.random();
		}
</script>
</head>
<body  >
<h1 align="center">欢迎来到商店管理系统</h1>
	<form action="loginDB.php" method="post">
			<table align="center">
				<tbody>
					<tr>
						<td>用户名:</td>
						<td> <input type="text" name="userName" placeholder="请输入用户名" /> </td>
					
						
					</tr>
					
					<tr>
						<td>密码:</td>
						<td> <input type="password" name="password" placeholder="请输入密码" />   </td>
					
					</tr>
					
					<tr>
						<td> 验证码:</td>
						<td><input type="text" name="code" placeholder="请输入验证码"></td> <td><img src="code.php" onclick=change(this) />   </td>
				
					</tr>
					
					
					<tr>
						<td></td>
						<td> <input type="submit" value="登录" />   </td>
					</tr>
					
					
					
				</tbody>
				
			</table>
		</form>
</body>
</html>
