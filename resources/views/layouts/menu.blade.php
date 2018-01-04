
<li class="{{ Request::is('articles*') ? 'active' : '' }}">
    <a href="{!! route('articles.index') !!}"><i class="fa fa-edit"></i><span>Articles</span></a>
</li>




<li class="{{ Request::is('comments*') ? 'active' : '' }}">
    <a href="{!! route('comments.index') !!}"><i class="fa fa-edit"></i><span>Comments</span></a>
</li>




<li class="{{ Request::is('referrals*') ? 'active' : '' }}">
    <a href="{!! route('referrals.index') !!}"><i class="fa fa-edit"></i><span>Referrals</span></a>
</li>

<li class="{{ Request::is('rangeSalaries*') ? 'active' : '' }}">
    <a href="{!! route('rangeSalaries.index') !!}"><i class="fa fa-edit"></i><span>RangeSalaries</span></a>
</li>

<li class="{{ Request::is('identityTypes*') ? 'active' : '' }}">
    <a href="{!! route('identityTypes.index') !!}"><i class="fa fa-edit"></i><span>IdentityTypes</span></a>
</li>

<li class="{{ Request::is('provinces*') ? 'active' : '' }}">
    <a href="{!! route('provinces.index') !!}"><i class="fa fa-edit"></i><span>Provinces</span></a>
</li>

<li class="{{ Request::is('cities*') ? 'active' : '' }}">
    <a href="{!! route('cities.index') !!}"><i class="fa fa-edit"></i><span>Cities</span></a>
</li>

<li class="{{ Request::is('subDistricts*') ? 'active' : '' }}">
    <a href="{!! route('subDistricts.index') !!}"><i class="fa fa-edit"></i><span>SubDistricts</span></a>
</li>

<li class="{{ Request::is('urbanVillages*') ? 'active' : '' }}">
    <a href="{!! route('urbanVillages.index') !!}"><i class="fa fa-edit"></i><span>UrbanVillages</span></a>
</li>

<li class="{{ Request::is('akads*') ? 'active' : '' }}">
    <a href="{!! route('akads.index') !!}"><i class="fa fa-edit"></i><span>Akads</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('banks*') ? 'active' : '' }}">
    <a href="{!! route('banks.index') !!}"><i class="fa fa-edit"></i><span>Banks</span></a>
</li>

<li class="{{ Request::is('typeTransactions*') ? 'active' : '' }}">
    <a href="{!! route('typeTransactions.index') !!}"><i class="fa fa-edit"></i><span>TypeTransactions</span></a>
</li>

