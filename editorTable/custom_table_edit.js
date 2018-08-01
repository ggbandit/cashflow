$(document).ready(function(){
$('#income_table').Tabledit({
deleteButton: false,
editButton: false,
columns: {
identifier: [0, 'id'],
editable: [[1, 'รายรับ'],[2,'balance'],[3,'balance'],[3,'balance'],[4,'balance'],[5,'balance'],[6,'balance'],[7,'balance']
			,[8,'balance'],[9,'balance'],[10,'balance'],[11,'balance'],[12,'balance'],[13,'balance']]
},
hideIdentifier: true,
url: 'editorTable/server.php'
});
$('#moneyout_table').Tabledit({
deleteButton: false,
editButton: false,
columns: {
identifier: [0, 'id'],
editable: [[1, 'รายจ่าย'],[2,'balance'],[3,'balance'],[3,'balance'],[4,'balance'],[5,'balance'],[6,'balance'],[7,'balance']
			,[8,'balance'],[9,'balance'],[10,'balance'],[11,'balance'],[12,'balance'],[13,'balance']]
},
hideIdentifier: true,
url: 'editorTable/server.php'
});
});

