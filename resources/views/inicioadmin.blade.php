  @extends('admin.admin')
  @section('titulo','Inicio admin')
  @section('contenido')


	<div class="page-header labeladmin">
  		<h1>Bienvenido al panel admin<small>¿que quieres hacer?</small></h1>
	</div>
	<div class="panel panel-default">
  		<div class="panel-body">
		    <div class="btn-group btn-group-justified" role="group" aria-label="...">
		  		<div class="btn-group" role="group">
		    		<!--<a href="{{route('admin.listausuarios')}}" onmouseover="javascript:this.style.backgroundColor='#19F0DB';" onmouseout="javascript:this.style.backgroundColor='#00D2A8';" class="btn btn-primary botonpaneladmin">Lista usuario</a>-->
					<div class="btn-group botonpanel" role="group">
  						<button type="button" class="btn btn-default dropdown-toggle botonpaneladmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onmouseover="javascript:this.style.backgroundColor='#19F0DB';" onmouseout="javascript:this.style.backgroundColor='#00D2A8';">
    						Usuarios <span class="caret"></span>
  						</button>
							<ul class="dropdown-menu ">
							    <li><a href="{{route('admin.listausuarios')}}">Ver lista usuarios</a></li>
							    <li role="separator" class="divider"></li>
							    <li><a href="{{route('admin.createuser')}}">Añadir usuario</a></li>
		  					</ul>
		  			</div>
			  		<div class="btn-group botonpanel" role="group">
			  			<button type="button" class="btn btn-default dropdown-toggle botonpaneladmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onmouseover="javascript:this.style.backgroundColor='#19F0DB';" onmouseout="javascript:this.style.backgroundColor='#00D2A8';">
    						Articulos <span class="caret"></span>
  						</button>
							<ul class="dropdown-menu">
							    <li><a href="{{route('admin.listaarticulos')}}">Ver lista articulos</a></li>
							    <li role="separator" class="divider"></li>
							    <li><a href="{{route('articles.create')}}">Añadir articulos</a></li>
		  					</ul>
		  			</div>
			  		<div class="btn-group botonpanel" role="group">
			  			<button type="button" class="btn btn-default dropdown-toggle botonpaneladmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onmouseover="javascript:this.style.backgroundColor='#19F0DB';" onmouseout="javascript:this.style.backgroundColor='#00D2A8';">
    						Categorias <span class="caret"></span>
  						</button>
							<ul class="dropdown-menu">
							    <li><a href="{{route('categories.listacategorias')}}">Ver lista categorias</a></li>
							    <li role="separator" class="divider"></li>
							    <li><a href="{{route('categories.create')}}">Añadir categorias</a></li>
		  					</ul>
					</div>
			  		<div class="btn-group botonpanel" role="group">
			    		
			    		<button type="button" class="btn btn-default dropdown-toggle botonpaneladmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onmouseover="javascript:this.style.backgroundColor='#19F0DB';" onmouseout="javascript:this.style.backgroundColor='#00D2A8';">
    						Tags <span class="caret"></span>
  						</button>
							<ul class="dropdown-menu">
							    <li><a href="{{route('tags.listatags')}}">Ver lista categorias</a></li>
							    <li role="separator" class="divider"></li>
							    <li><a href="{{route('tag.create')}}">Añadir tags</a></li>
		  					</ul>
			  		</div>
				</div>
			</div>
		</div>
	</div>



  @endsection