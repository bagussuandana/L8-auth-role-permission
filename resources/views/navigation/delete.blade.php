<form action="{{route('navigation.delete', $navigation)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="w-full mt-3 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
    Delete
</button>
</form>