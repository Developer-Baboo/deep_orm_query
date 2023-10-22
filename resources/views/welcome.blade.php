<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="overflow-x-auto mt-6">
            <table class="table-auto border-collapse w-full">
                <thead>
                    <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                        <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Title</th>
                        <th class="px-4 py-2 " style="background-color:#f8f8f8">Author</th>
                        <th class="px-4 py-2 " style="background-color:#f8f8f8">Created At</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-normal text-gray-700">
                    @foreach ($posts as $post)
                        <tr class="hover:bg-gray-100 hover:text-blue-400 border-b border-gray-200 py-10">
                            <td class="px-4 py-4"><a
                                    href="{{ route('post.view', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                            </td>
                            <td class="px-4 py-4">{{ $post->user->name }}</td>
                            <td class="px-4 py-4">{{ $post->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
