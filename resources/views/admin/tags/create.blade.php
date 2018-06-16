        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Add New Tag
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form method="post" action="{{ route('admin.tags.create') }}" class="m-form">
                <div class="m-portlet__body">   
                    <div class="m-form__section m-form__section--first">

                        <div class="form-group m-form__group">
                            <label for="example_input_full_name">Name</label>
                            <input type="text" id="name" name="name" class="form-control m-input" placeholder="Enter tag name" onfocusout="strSlug()">
                            <span class="m-form__help">The name is how it appears on your site.</span>
                        </div>
                        <div class="form-group m-form__group">
                            <label onfocus>Slug</label>
                            <input type="text" id="slug" class="form-control m-input" placeholder="Enter slug" name="slug">
                            <span class="m-form__help">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
                        </div>          
                        <div class="form-group m-form__group">
                            <label>Description</label>
                            <textarea class="form-control m-input" name="description" rows="5" placeholder="Enter description"></textarea>
                            <span class="m-form__help">The description is not prominent by default; however, some themes may show it.</span>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        @csrf
                        <button type="submit" class="btn btn-primary custom-small-button">Add New Tag</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>