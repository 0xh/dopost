@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-4">
            <h1 class="username">{{ $user->name }}</h1>

            <div class="avatar">
                @if ($isPageOwner)
                    <a href="#" data-toggle="modal" data-target="#myModal"><img src="{{ url("images/no-avatar.png") }}" title="change avatar"></a>
                @else
                    <img src="{{ url("images/no-avatar.png") }}" >
                @endif
            </div>

        </div>

        <div class="col-md-8 wall">
            <h3>Wall</h3>
            <ul class="list-unstyled list-group">
                <li class="list-group-item" style=" padding: 10px; margin-left: 1px; display: inline-block">
                    <div class="avatar col-md-1" style="margin-top: 5px; padding: 0">

                        <img src="{{ url("images/no-avatar.png") }}"  >
                    </div>

                    <div class="col-md-11 " style="padding-left: 10px; margin: 0; ">
                        <p style="margin-bottom: 0"> <b>{{ $user->name }}</b>   </p>
                        <p>
                            not only five centuries, but also the leap into electronic typesetting, remaining e
                            ssentially unchanged. It was popularised in Ipsum passages, and
                        </p>

                    </div>
                </li>

                <li class="list-group-item" style=" padding: 10px; margin-left: 1px; display: inline-block">
                    <div class="avatar col-md-1" style="margin-top: 5px; padding: 0">

                        <img src="{{ url("images/no-avatar.png") }}"  >
                    </div>

                    <div class="col-md-11 " style="padding-left: 10px; margin: 0; ">
                        <p style="margin-bottom: 0"> <b>{{ $user->name }}</b>   </p>
                        <p>
                            not only five centuries, but also the leap into electronic typesetting, remaining e
                            ssentially unchanged. It was popularised in Ipsum passages, and
                        </p>

                    </div>
                </li>

                <li class="list-group-item" style=" padding: 10px; margin-left: 1px; display: inline-block">
                    <div class="avatar col-md-1" style="margin-top: 5px; padding: 0">

                        <img src="{{ url("images/no-avatar.png") }}"  >
                    </div>

                    <div class="col-md-11 " style="padding-left: 10px; margin: 0; ">
                        <p style="margin-bottom: 0"> <b>{{ $user->name }}</b>   </p>
                        <p>
                            not only five centuries, but also the leap into electronic typesetting, remaining e
                            ssentially unchanged. It was popularised in Ipsum passages, and
                        </p>

                    </div>
                </li>

                <li class="list-group-item" style=" padding: 10px; margin-left: 1px; display: inline-block">
                    <div class="avatar col-md-1" style="margin-top: 5px; padding: 0">

                        <img src="{{ url("images/no-avatar.png") }}"  >
                    </div>

                    <div class="col-md-11 " style="padding-left: 10px; margin: 0; ">
                        <p style="margin-bottom: 0"> <b>{{ $user->name }}</b>   </p>
                        <p>
                            not only five centuries, but also the leap into electronic typesetting, remaining e
                            ssentially unchanged. It was popularised in Ipsum passages, and
                        </p>

                    </div>
                </li>

                <li class="list-group-item" style=" padding: 10px; margin-left: 1px; display: inline-block; width: 100%">
                    <div class="avatar col-md-1" style="margin-top: 5px; padding: 0">

                        <img src="{{ url("images/no-avatar.png") }}">
                    </div>

                    <div class="col-md-11 " style="padding-left: 10px; margin: 0; ">
                        <p style="margin-bottom: 0"> <b>{{ $user->name }}</b>   </p>
                        <p>
                            not only five centuries, but also the leap into electronic typesetting, remaining e
                        </p>

                    </div>
                </li>
            </ul>
        </div>


        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New photo</h4>
                    </div>
                    <form action="/load" method="post" id="my_form" enctype="multipart/form-data" target="hiddenframe">
                        <div class="modal-body">

                            {{ csrf_field() }}

                            <label class="btn btn-primary" for="avatar">
                                <input type="file" name="avatar" id="avatar" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                                Choose an image
                            </label>

                            <span id="upload-file-info" style="color: black; font-size: 15px"></span>



                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="submit" class="btn btn-primary" data-dismiss="modal" style="float:left">Upload</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>


        <iframe id=hiddenframe name=hiddenframe style="width:0px; height:0px; border:0px"></iframe>


    </div>
@endsection
