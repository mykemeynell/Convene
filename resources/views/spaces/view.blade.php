@inject('service', Convene\Storage\Service\Contract\SpaceAccessServiceInterface)

@extends('layouts.page', [
    // 'page_title' => ['Spaces', 'View'],
])

{{--@push('title_buttons')--}}
{{--    <a href="{{ route('spaces.view') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Show All Spaces</a>--}}
{{--@endpush--}}

@section('body')

    <!-- Editor wrapper -->
    <div id="gjs-wrapper">



        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1>Getting Started With Spaces</h1>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <img width="256" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDQ5MC40MDcgNDkwLjQwNyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDkwLjQwNyA0OTAuNDA3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8cGF0aCBzdHlsZT0iZmlsbDojRkJCMDNCOyIgZD0iTTQyOC41OTgsMjkzLjYxOWgtNjQuOTMxYy0xMi40NTEsMzAuNDMtMzYuNjk4LDU1LjI3Ni02Ni44Myw2OC40NzZ2NjUuMzU0DQoJCUMzNjEuNDU2LDQwOS40OTgsNDExLjY1MywzNTguNTMxLDQyOC41OTgsMjkzLjYxOXogTTM5Ni4xNywzMDIuOTg2bDEzLjc3LDYuMTQ5Yy0zLjg5Miw4LjcwOC04LjUzMSwxNy4xOTEtMTMuNzk2LDI1LjIxNA0KCQlsLTEyLjYwNy04LjI3N0MzODguMzU3LDMxOC43MjYsMzkyLjYwOSwzMTAuOTU3LDM5Ni4xNywzMDIuOTg2eiBNMzE3Ljc0Miw0MDAuNTIybC02LjAzMS0xMy44MjINCgkJYzIxLjQ0Ny05LjM1OSw0MS4wNzEtMjMuNTU3LDU2Ljc1Ni00MS4wNTNsMTEuMjMsMTAuMDY2QzM2Mi41OCwzNzQuODA4LDM0MS4xNTksMzkwLjMwNSwzMTcuNzQyLDQwMC41MjJ6Ii8+DQoJPHBhdGggc3R5bGU9ImZpbGw6I0ZCQjAzQjsiIGQ9Ik0xOTYuNjQyLDQyNy44MDd2LTY1LjE0OWMtMTUuNTg0LTYuNjE2LTI5LjYzLTE2LjMyNC00MS4zNDQtMjguMzE0djc2Ljc3Ng0KCQlDMTY4LjIzMSw0MTguMjI0LDE4Mi4wODIsNDIzLjg2OCwxOTYuNjQyLDQyNy44MDd6Ii8+DQoJPHBhdGggc3R5bGU9ImZpbGw6I0ZCQjAzQjsiIGQ9Ik0yOTYuODM2LDYzLjk3N3Y2NS4zMzZjMjguODk5LDEyLjU5LDUyLjAwNCwzNS40MTQsNjQuOTYsNjQuMTExaDY1LjU5MQ0KCQlDNDA5LjMzOSwxMzAuNzQsMzU5LjY1NCw4MS40ODMsMjk2LjgzNiw2My45Nzd6Ii8+DQoJPHBhdGggc3R5bGU9ImZpbGw6I0ZCQjAzQjsiIGQ9Ik0xOTYuNjQyLDEyOC43NTFWNjMuNjE0Yy0xNC41NiwzLjk0LTI4LjQwOCw5LjU5Mi00MS4zNDQsMTYuNjk5djc2LjU5OA0KCQlDMTY2Ljk3MSwxNDQuOTc3LDE4MC45ODUsMTM1LjM2NSwxOTYuNjQyLDEyOC43NTF6Ii8+DQoJPHBhdGggc3R5bGU9ImZpbGw6I0Y3OTMxRTsiIGQ9Ik0xNTUuMjk4LDE1Ni45MTFWODAuMzEzYy00My40NjgsMjMuODgxLTc2LjUwMyw2NC4zNzQtOTAuNTE4LDExMy4xMTFoNjUuNTg1DQoJCUMxMzYuNTM3LDE3OS43NTYsMTQ1LjAwOCwxNjcuNDMxLDE1NS4yOTgsMTU2LjkxMXoiLz4NCgk8cGF0aCBzdHlsZT0iZmlsbDojRjc5MzFFOyIgZD0iTTE1NS4yOTgsNDExLjEyMXYtNzYuNzc2Yy0xMS4zOTEtMTEuNjU5LTIwLjU3Ny0yNS40NzctMjYuODExLTQwLjcyNUg2My41NzYNCgkJQzc2LjgzMiwzNDQuMzEzLDExMC41MjQsMzg2LjUyOSwxNTUuMjk4LDQxMS4xMjF6Ii8+DQoJPHJlY3QgeD0iOTQuNzUiIHk9IjIwOC41MDUiIHN0eWxlPSJmaWxsOiMyOUFCRTI7IiB3aWR0aD0iNTMuMDE1IiBoZWlnaHQ9IjcwLjAzMyIvPg0KCTxyZWN0IHg9IjQxLjY0OSIgeT0iMjA4LjUwNSIgc3R5bGU9ImZpbGw6IzFGODBBQTsiIHdpZHRoPSI1My4xIiBoZWlnaHQ9IjcwLjAzMyIvPg0KCTxyZWN0IHg9IjM5OS43MjIiIHk9IjIwOC41MDUiIHN0eWxlPSJmaWxsOiMyOUFCRTI7IiB3aWR0aD0iNTIuMTA3IiBoZWlnaHQ9IjcwLjAzMyIvPg0KCTxyZWN0IHg9IjM0NS43MTciIHk9IjIwOC41MDUiIHN0eWxlPSJmaWxsOiMxRjgwQUE7IiB3aWR0aD0iNTQuMDA1IiBoZWlnaHQ9IjcwLjAzMyIvPg0KCTxyZWN0IHg9IjI0OS4yMDMiIHk9IjM4LjQzMiIgc3R5bGU9ImZpbGw6IzI5QUJFMjsiIHdpZHRoPSIzMi41NTMiIGhlaWdodD0iMTA2LjExMiIvPg0KCTxyZWN0IHg9IjIxMS43MjMiIHk9IjM4LjQzMiIgc3R5bGU9ImZpbGw6IzFGODBBQTsiIHdpZHRoPSIzNy40OCIgaGVpZ2h0PSIxMDYuMTEyIi8+DQoJPHJlY3QgeD0iMjQ5LjIwMyIgeT0iMzQ1LjI5IiBzdHlsZT0iZmlsbDojMjlBQkUyOyIgd2lkdGg9IjMyLjU1MyIgaGVpZ2h0PSIxMDYuMTEyIi8+DQoJPHJlY3QgeD0iMjExLjcyMyIgeT0iMzQ1LjI5IiBzdHlsZT0iZmlsbDojMUY4MEFBOyIgd2lkdGg9IjM3LjQ4IiBoZWlnaHQ9IjEwNi4xMTIiLz4NCgk8cGF0aCBkPSJNMTk2LjY0Miw0MjcuODA3Yy0xNC41NTktMy45MzktMjguNDEtOS41ODMtNDEuMzQ0LTE2LjY4N2MtNDQuNzczLTI0LjU5MS03OC40NjYtNjYuODA3LTkxLjcyMi0xMTcuNTAyaC0xNS41NQ0KCQljMTcuNzYsNzMuNzA5LDc1LjMxMiwxMzEuNTA1LDE0OC42MTYsMTQ5Ljc2OVY0MjcuODA3eiIvPg0KCTxwYXRoIGQ9Ik00MjguNTk4LDI5My42MTljLTE2Ljk0NSw2NC45MTItNjcuMTQyLDExNS44NzktMTMxLjc2MiwxMzMuODMxdjE1LjYxM0MzNjkuODQyLDQyNC4zOCw0MjYuNTEzLDM2Ni45LDQ0NC4xNDUsMjkzLjYyDQoJCWgtMTUuNTQ3VjI5My42MTl6Ii8+DQoJPHBhdGggZD0iTTQ2Ni45MSwyMjEuNjg2di0yOC4yNjJoLTIzLjg3NUM0MjQuMjIsMTIyLjM5MSwzNjcuOTg2LDY2LjYxMSwyOTYuODM2LDQ4LjM2MlYyMy4zNTFoLTI0LjA2DQoJCUMyNzEuMzEzLDEwLjU4NywyNjAuMTk3LDAsMjQ2Ljc0MSwwYy0xMy40NTYsMC0yNC41NzIsMTAuNTg3LTI2LjAzNiwyMy4zNTFoLTI0LjA2NHYyNC42ODMNCgkJQzEyNC44MTQsNjUuOTMsNjguMDgyLDEyMS44MTcsNDkuMTMzLDE5My40MjRIMjYuNTY4djI1LjU4OUMxMi4zNzYsMjE5LjMsMC4xMTQsMjMxLjI4LDAuMTE0LDI0NS45NzNzMTIuMjYyLDI2LjY3MywyNi40NTQsMjYuOTYNCgkJdjIwLjY4NmgyMS40NThoMTUuNTVoNjQuOTEyYzYuMjMzLDE1LjI0OSwxNS40MiwyOS4wNjYsMjYuODExLDQwLjcyNWMxMS43MTQsMTEuOTksMjUuNzYsMjEuNjk4LDQxLjM0NCwyOC4zMTR2NjUuMTQ5djE1LjU4DQoJCXYyMy4wOTVoMjMuOTg1YzEuMDYzLDE0LjY4MSwxMi4zNjYsMjMuOTI1LDI2LjExNCwyMy45MjVzMjUuMDUxLTkuMjQ0LDI2LjExNC0yMy45MjVoMjMuOTgydi0yMy40MjFWNDI3LjQ1di02NS4zNTQNCgkJYzMwLjEzMi0xMy4yLDU0LjM4LTM4LjA0Niw2Ni44My02OC40NzZoNjQuOTMxaDE1LjU0N2gyMi43NjV2LTE5Ljc2YzE1LjE5Mi0xLjIzNCwyMy4zODItMTIuNDYxLDIzLjM4Mi0yNi4wODcNCgkJUzQ4Mi4xMDIsMjIyLjkyLDQ2Ni45MSwyMjEuNjg2eiBNMjYuNTY4LDI1Ny40MDJjLTcuODQxLTAuMjE4LTEwLjkzLTUuMjUzLTEwLjkzLTExLjQyOXMzLjA4OS0xMS4yMTEsMTAuOTMtMTEuNDI5VjI1Ny40MDJ6DQoJCSBNNDUxLjgyOSwyNzguNTM4aC01Mi4xMDdoLTU0LjAwNXYtNzAuMDMzaDU0LjAwNWg1Mi4xMDdWMjc4LjUzOHogTTI0OS4yMDMsNDUxLjQwMmgtMzcuNDhWMzQ1LjI5aDM3LjQ4aDMyLjU1M3YxMDYuMTEySDI0OS4yMDN6DQoJCSBNMjk2LjgzNiwzNDUuNDF2LTE1LjJIMTk2LjY0MnYxNS44NTljLTIyLjUwMy0xMS4xNS00MC44NjMtMjkuNzYzLTUxLjY3Mi01Mi40NWgxNy44NzZWMTkzLjQyNGgtMTUuNjkzDQoJCWMxMS4wMi0yMC44NjYsMjguMzMtMzcuNjg1LDQ5LjQ4OS00OC4wOTd2MTQuMjk4aDEwMC4xOTV2LTEzLjY0MmMyMC41OTcsMTAuNDcxLDM3LjQxLDI3LjAzMSw0OC4xODQsNDcuNDQyaC0xNC4zODVWMjkzLjYyaDE2LjU1DQoJCUMzMzYuNTk2LDMxNS44MjcsMzE4Ljc0MSwzMzQuMTksMjk2LjgzNiwzNDUuNDF6IE0yNDkuMjAzLDM4LjQzMmgzMi41NTN2MTA2LjExMmgtMzIuNTUzaC0zNy40OFYzOC40MzJIMjQ5LjIwM3ogTTM2MS43OTcsMTkzLjQyNA0KCQljLTEyLjk1Ny0yOC42OTYtMzYuMDYxLTUxLjUyMS02NC45Ni02NC4xMTFWNjMuOTc3YzYyLjgxOCwxNy41MDYsMTEyLjUwMyw2Ni43NjIsMTMwLjU1MSwxMjkuNDQ3TDM2MS43OTcsMTkzLjQyNEwzNjEuNzk3LDE5My40MjQNCgkJeiBNMTU1LjI5OCw4MC4zMTNjMTIuOTM1LTcuMTA3LDI2Ljc4NC0xMi43NTksNDEuMzQ0LTE2LjY5OXY2NS4xMzdjLTE1LjY1Niw2LjYxNC0yOS42NywxNi4yMjYtNDEuMzQ0LDI4LjE2DQoJCWMtMTAuMjksMTAuNTItMTguNzYxLDIyLjg0NS0yNC45MzQsMzYuNTEzSDY0Ljc3OUM3OC43OTUsMTQ0LjY4NywxMTEuODMsMTA0LjE5NCwxNTUuMjk4LDgwLjMxM3ogTTQxLjY0OSwyMDguNTA1aDUzLjFoNTMuMDE1DQoJCXY3MC4wMzNIOTQuNzVoLTUzLjFMNDEuNjQ5LDIwOC41MDVMNDEuNjQ5LDIwOC41MDV6IE0yNDYuNzQxLDE1LjA4MWM1LjM0MywwLDkuODE0LDIuMzcyLDEwLjg3OSw4LjI3aC0yMS43NTgNCgkJQzIzNi45MjcsMTcuNDUzLDI0MS4zOTgsMTUuMDgxLDI0Ni43NDEsMTUuMDgxeiBNMjQ2Ljc0MSw0NzUuMzI3Yy01LjUxLDAtMTAuMDgzLTIuNTMzLTEwLjk1OS04Ljg0NGgyMS45MTkNCgkJQzI1Ni44MjQsNDcyLjc5NCwyNTIuMjUxLDQ3NS4zMjcsMjQ2Ljc0MSw0NzUuMzI3eiBNNDY2LjkxLDI1OC42NTh2LTIxLjc3MmM1LjkyMSwxLjA1NSw4LjMwMSw1LjUzNCw4LjMwMSwxMC44ODYNCgkJQzQ3NS4yMTEsMjUzLjEyNSw0NzIuODMxLDI1Ny42MDMsNDY2LjkxLDI1OC42NTh6Ii8+DQoJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik0zMTEuNzExLDM4Ni43MDFsNi4wMzEsMTMuODIyYzIzLjQxNy0xMC4yMTcsNDQuODM4LTI1LjcxNCw2MS45NTUtNDQuODA4bC0xMS4yMy0xMC4wNjYNCgkJQzM1Mi43ODMsMzYzLjE0NCwzMzMuMTU4LDM3Ny4zNDEsMzExLjcxMSwzODYuNzAxeiIvPg0KCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNNDA5Ljk0LDMwOS4xMzRsLTEzLjc3LTYuMTQ5Yy0zLjU2LDcuOTcxLTcuODEzLDE1Ljc0LTEyLjYzMiwyMy4wODVsMTIuNjA3LDguMjc3DQoJCUM0MDEuNDA5LDMyNi4zMjUsNDA2LjA0OCwzMTcuODQyLDQwOS45NCwzMDkuMTM0eiIvPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=" alt="" />
                </div>
            </div>
            <div class="row my-4">
                <div class="col-8 offset-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3>What Is a Space?</h3>
                            <p>Spaces are where you group your content into folders and pages. They can be added and removed
                            at will... there's no limit to the number you can have!</p>
                            <p>You can edit this and other pages by looking for the "Edit This Page" button in the upper right.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div><!-- end of editor wrapper -->

@endsection