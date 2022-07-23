<form action="{{route('teswa-send')}}" method="POST">
    @csrf
    <input type="text" name="nomer" >
    <textarea name="message" ></textarea>
    <button type="submit">Kirim</button>
</form>