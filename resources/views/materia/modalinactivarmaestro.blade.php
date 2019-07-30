<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
	id="modal-delete-{{$items->idmp}}">
	{{Form::Open(array('action'=>array('MaestroMateriaController@destroy',$items->idmp),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Remover Maestro</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea remover a {{$items->nombre}} como maestro</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>