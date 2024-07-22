<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $content->cname ? $content->cname . ' Agreement - Paradise InfoTech' : 'Agreement - Paradise InfoTech' }}
    </title>
    <link rel="canonical" href="{{ Request::url() }}" />
    <style>
        @page {
            margin: 0cm 0cm;
        }

        img {
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            margin: 5rem 3rem;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: auto;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        h2 {
            padding-bottom: 5px;
            margin-top: 10px;
            font-size: 22px;
            color: #0959a2;
            ;
        }

        p,
        ul,
        ol {
            margin-bottom: 20px;
            font-size: 16px;
        }

        ul {
            list-style: disc inside;
        }

        a {
            color: #0959a2;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <img src="frontend/assets/images/paradise-letter-head.jpg" alt="">
    <div class="container">
        {!! $content->agreement
            ? $content->agreement
            : ($setting['default_agreement']
                ? $setting['default_agreement']
                : '') !!}
        <section>
            <h2>Information We Take</h2>
            <table>
                <tbody>

                    <tr>
                        <td>Company Name</td>
                        <td>{{ $content->cname }}</td>
                    </tr>
                    <tr>
                        <td>Company Phone</td>
                        <td>{{ $content->cnumber }}</td>
                    </tr>
                    <tr>
                        <td>Company Email</td>
                        <td>{{ $content->cmail }}</td>
                    </tr>
                    <tr>
                        <td>Company Address</td>
                        <td>{{ $content->caddress }}</td>
                    </tr>
                    <tr>
                        <td>Company Fax</td>
                        <td>{{ $content->cfax }}</td>
                    </tr>
                    <tr>
                        <td>Company Website</td>
                        <td>{{ $content->curl }}</td>
                    </tr>
                    <tr>
                        <td>Company Registration</td>
                        <td>{{ $content->cregistration }}</td>
                    </tr>
                    <tr>
                        <td>Company Pan</td>
                        <td>{{ $content->cpan }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $content->name }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $content->phone }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $content->email }}</td>
                    </tr>
                    <tr>
                        <td>Designation</td>
                        <td>{{ $content->designation }}</td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td><span
                                class="badge rounded-pill bg-label-{{ $content->status == 1 ? 'success' : 'danger' }}">{{ $content->status == 1 ? 'Agreed' : 'Not Agreed' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>{{ $content->updated_at->diffForHumans() }}</td>
                    </tr>
                </tbody>

            </table>
        </section>

    </div>
</body>

</html>
