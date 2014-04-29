var alert_URL = "";
document.writeln('<div class="modal fade" id="alert_Warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;">');
document.writeln('<div class="modal-dialog">');
document.writeln('<div class="modal-content">');
document.writeln('<div class="modal-header">');
document.writeln('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>');
document.writeln('<h4 class="modal-title" id="myModalLabel">消 息 确 认</h4>');
document.writeln('</div>');
document.writeln('<div class="modal-body" id="alert_Warningcontent">');
document.writeln('');
document.writeln('</div>');
document.writeln('<div class="modal-footer">');
document.writeln('<button type="button" class="btn btn-primary blue" id="alert_sure">确 认</button>');
document.writeln('<button type="button" class="btn btn-default" data-dismiss="modal">取 消</button>');
document.writeln('</div></div></div></div>');						
function confirm(object,str){
	alert_URL = object.href;
	$('#alert_Warningcontent').html(str);
	$('#alert_Warning').modal('show');
	return false;
}
$("#alert_sure").click(function(){
	location.href = alert_URL;
})