@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.booking.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bookings.update", [$booking->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama_pemesan">{{ trans('cruds.booking.fields.nama_pemesan') }}</label>
                <input class="form-control {{ $errors->has('nama_pemesan') ? 'is-invalid' : '' }}" type="text" name="nama_pemesan" id="nama_pemesan" value="{{ old('nama_pemesan') }}" required>
                @if($errors->has('nama_pemesan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_pemesan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.nama_pemesan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_book">{{ trans('cruds.booking.fields.start_book') }}</label>
                <input class="form-control datetime {{ $errors->has('start_book') ? 'is-invalid' : '' }}" type="text" name="start_book" id="start_book" value="{{ old('start_book', $booking->start_book) }}" required>
                @if($errors->has('start_book'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_book') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.start_book_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="finish_book">{{ trans('cruds.booking.fields.finish_book') }}</label>
                <input class="form-control datetime {{ $errors->has('finish_book') ? 'is-invalid' : '' }}" type="text" name="finish_book" id="finish_book" value="{{ old('finish_book', $booking->finish_book) }}" required>
                @if($errors->has('finish_book'))
                    <div class="invalid-feedback">
                        {{ $errors->first('finish_book') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.finish_book_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.booking.fields.category') }}</label>
                <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" id="category" required>
                    <option value disabled {{ old('category', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Booking::CATEGORY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('category', $booking->category) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.booking.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Booking::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $booking->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection