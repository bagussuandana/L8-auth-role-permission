@csrf
        <div class="flex flex-col mt-2">
            <label for="parent_id" class="hidden">Parent</label>
            <select name="parent_id" id="parent_id" class="js-example-basic-multiple block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option selected disabled>Choose a parent</option>
                @foreach ($navigations as $item)
                <option {{$item->id == $navigation->parent_id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('parent_id')
            <div class="mt-2 block text-sm text-left text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="flex flex-col mt-2">
            <label for="permission_name" class="hidden">Permission</label>
            <select name="permission_name" id="permission_name" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option selected disabled>Choose Permission</option>
                @foreach ($permissions as $item)
                <option {{$item->name == $navigation->permission_name ? 'selected' : ''}} value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('permission_name')
            <div class="mt-2 block text-sm text-left text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="flex flex-col mt-2">
            <label for="name" class="hidden">Name</label>
            <input type="text" value="{{old('name') ?? $navigation->name}}" name="name" id="name" placeholder="Create New Posts" class="w-100 text-sm mt-2 py-2 px-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
        </div>
        @error('name')
        <div class="mt-2 block text-sm text-left text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="flex flex-col mt-2">
            <label for="url" class="hidden">URL</label>
            <input type="text" value="{{old('url') ?? $navigation->url}}" name="url" id="url" placeholder="posts/create" class="w-100 text-sm mt-2 py-2 px-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
        </div>
        @error('url')
        <div class="mt-2 block text-sm text-left text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm" role="alert">
            {{$message}}
        </div>
        @enderror



        <button type="submit" class="mt-3 text-sm bg-teal-500 hover:bg-teal-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            {{$submit}}
        </button>