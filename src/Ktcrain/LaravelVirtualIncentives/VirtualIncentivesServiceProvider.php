<?php namespace Ktcrain\LaravelVirtualIncentives;

use Illuminate\Support\ServiceProvider;

/**
 * 	Laravel Virtual Incentives
 *
 *	The MIT License (MIT)
 *	
 *	Copyright (c) 2014 TinyRocket
 *	
 *	Permission is hereby granted, free of charge, to any person obtaining a copy
 *	of this software and associated documentation files (the "Software"), to deal
 *	in the Software without restriction, including without limitation the rights
 *	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *	copies of the Software, and to permit persons to whom the Software is
 *	furnished to do so, subject to the following conditions:
 *	
 *	The above copyright notice and this permission notice shall be included in
 *	all copies or substantial portions of the Software.
 *	
 *	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *	THE SOFTWARE.
 *
 * 	@category   VirtualIncentives
 * 	@package    LaravelVirtualIncentives_VirtualIncentivesServiceProvider
 * 	@author     Katie Crain <kt.crain@gmail.com>
 * 	@copyright  2015 Katie Crain
 *
 */

class VirtualIncentivesServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ktcrain/laravel-virtualincentives');

	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerVirtualIncentivesClient();
	}

	/**
	 * Register the VirtualIncentives Client Facacde Accessor
	 *
	 * @return void
	 */
	public function registerVirtualIncentivesClient()
	{
		$this->app['VirtualIncentives'] = $this->app->share(function($app)
	    {
	    	$viClient = new \Ktcrain\VirtualIncentives\Client($app['config']->get('virtualincentives'));
        	return $viClient;
	    });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
