@extends('index')

@section('css')

@endsection

@section('js')

@endsection

@section('content')

<div class="main_wrapper">
  <header>
    <h4 style="display:inline-block;" class="room_name">{{ $room->name }}</h4>
  </header>

  <div class="main">
    <table class="score_card">
      <tr class="index">
        <td><span>Hole</span></td>
        <td><span>1</span></td>
        <td><span>2</span></td>
        <td><span>3</span></td>
        <td><span>4</span></td>
        <td><span>5</span></td>
        <td><span>6</span></td>
        <td><span>7</span></td>
        <td><span>8</span></td>
        <td><span>9</span></td>
        <td><span>10</span></td>
        <td><span>11</span></td>
        <td><span>12</span></td>
        <td><span>13</span></td>
        <td><span>14</span></td>
        <td><span>15</span></td>
        <td><span>16</span></td>
        <td><span>17</span></td>
        <td><span>18</span></td>
        <td class="total"><span>Total</span></td>
      </tr>
      @foreach($room_players as $room_player)
      <tr class="player">
        <td><input class="name" data-id="{{ $room_player->id }}" data-column="name" type="text" placeholder="名前を入力" value="{{ $room_player->name }}" maxlength='8'></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_1" type="number" value="{{ $room_player->hole_1 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_2" type="number" value="{{ $room_player->hole_2 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_3" type="number" value="{{ $room_player->hole_3 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_4" type="number" value="{{ $room_player->hole_4 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_5" type="number" value="{{ $room_player->hole_5 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_6" type="number" value="{{ $room_player->hole_6 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_7" type="number" value="{{ $room_player->hole_7 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_8" type="number" value="{{ $room_player->hole_8 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_9" type="number" value="{{ $room_player->hole_9 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_10" type="number" value="{{ $room_player->hole_10 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_11" type="number" value="{{ $room_player->hole_11 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_12" type="number" value="{{ $room_player->hole_12 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_13" type="number" value="{{ $room_player->hole_13 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_14" type="number" value="{{ $room_player->hole_14 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_15" type="number" value="{{ $room_player->hole_15 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_16" type="number" value="{{ $room_player->hole_16 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_17" type="number" value="{{ $room_player->hole_17 }}" max="50"></td>
        <td><input data-id="{{ $room_player->id }}" data-column="hole_18" type="number" value="{{ $room_player->hole_18 }}" max="50"></td>
        <td><span>{{ $room_player->hole_1 + $room_player->hole_2 + $room_player->hole_3 + $room_player->hole_4 + $room_player->hole_5 + $room_player->hole_6 + $room_player->hole_7 + $room_player->hole_8 + $room_player->hole_9 + $room_player->hole_10 + $room_player->hole_11 + $room_player->hole_12 +  $room_player->hole_13 + $room_player->hole_14 + $room_player->hole_15 + $room_player->hole_16 +  $room_player->hole_17 + $room_player->hole_18 }}</span></td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="update_btn_panel">
    <a href="" class="update_btn"><span>update</span></a>
  </div>
  <div class="home_btn_panel">
    <a href="/golf" class="home_btn"><span>>> Homeへ</span></a>
  </div>
</div>


<!-- Scripts -->
<script src="{{ mix('/js/app.js') }}" defer></script>

<!-- jQueryの読み込み -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>

$(function(){

  $('input').on('change', function() {
    const room = @json($room);
    const room_players = @json($room_players);
    let id = $(this).data('id');
    let column = $(this).data('column');
    let data = $(this).val();

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url: '/golf/room/update',
      dataType: 'json',
      data: {
        id: id,
        column: column,
        data: data,
      }
    }).done(function() {
      // 成功したときのコールバック
      console.log("Ajax成功");
    }).fail(function() {
      // 失敗したときのコールバック
      console.log("Ajax失敗");
    }).always(function() {
      // 成否に関わらず実行されるコールバック
      console.log("Ajax実行");
    });
  });

});

</script>

@endsection