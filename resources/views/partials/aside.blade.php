                        <div class="panel panel-primary">
                          <div class="panel-heading leftname">
                            <h3 class="panel-title ">Categorias</h3>
                          </div>
                          <div class="panel-body">
                            <ul class="list-group">
                              
                              @foreach($categories as $category)
                              <li class="list-group-item">
                                <span class=" badge badge-error">{{$category->articles->count()}}</span>
                                <a href="{{route('search.category', $category->name)}}">
                                  {{$category->name}}
                                </a>
                              </li>
                              @endforeach
                            </ul>
                          </div>
                          

                        </div>

                        <div class="panel panel-primary">
                          <div class="panel-heading leftname">
                            <h3 class="panel-title">Tags</h3>
                          </div>
                          <div class="panel-body">
                          @foreach($tags as $tag)
                            <span class="label label-warning label-color">{{$tag->name}}</span>
                           @endforeach
                          </div>
                        </div>