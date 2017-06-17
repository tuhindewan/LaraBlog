@extends('layouts.main')

@section('title','| Edit Blog Post')

@section('content')
	
	<div class="row">
		{!! Form::model($post, ['route' => ['posts.update',$post->id],'method'=>'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('title','Title:') }}
			{{ Form::text('title',null,array('class'=>'form-control input-lg')) }}

			{{ Form::label('slug','Slug:') }}
			{{ Form::text('slug',null,array('class'=>'form-control ')) }}

			{{ Form::label('category_id','Category:') }}
			{{ Form::select('category_id',$categories,null,['class'=>'form-control']) }}

			{{ Form::label('body','Post Body:') }}
		    {{ Form::textarea('body',null,array('class'=>'form-control')) }}
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
				  <dt>Created At:</dt>
				  <dd> {{ date("M j, Y h:ia",strtotime($post->created_at))  }} </dd>
				</dl>

				<dl class="dl-horizontal">
				  <dt>Last Updated:</dt>
				  <dd> {{ date("M j, Y h:ia",strtotime($post->updated_at))  }} </dd>
				</dl>

				<hr>

				<div class="row">
					<div class="col-md-6">
						{!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
					</div>

					<div class="col-md-6">

						{{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) }}
						
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@endsection