@extends('shopify-app::layouts.default')

@section('content')

<div class="container mx-auto">

    <div class="bg-gray-50">
        <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <div class="mt-8 flex justify-between">

                <div class="">
                    <h4 class="text-xl leading-6 font-medium text-gray-900">Products wishlisted</h4>
                    <p class="mt-2 text-sm leading-6 text-gray-600">
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                    </p>
                </div>

                <div class="w-56">
                    <img src="/img/wishlist-header.svg" alt="">
                </div>

            </div>


        </div>
      </div>


    <div x-data="{ loading: true }" class="mt-4" x-init="axios.get('https://wishlist-inspire.test/wishlists')
                .then(function(response) {

                    $refs.productTable.innerHTML =  response.data;
                    console.log(response)
                })
                .catch(function(error){
                    console.log('ERROR:', error)
                });

    ">
        <div x-ref="productTable"></div>
    </div>
</div>


@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        var AppBridge = window['app-bridge'];
        var actions = AppBridge.actions;
        var TitleBar = actions.TitleBar;
        var Button = actions.Button;
        var Redirect = actions.Redirect;
        var titleBarOptions = {
            title: 'Products',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>
@endsection
