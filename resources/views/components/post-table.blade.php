<div>
    <table>
        <thead>
            <tr>
                <th>Judul</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->judul }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>