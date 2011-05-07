<?php
/*
 * Copyright 2011 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace PayPalNVP\Response;

require_once 'Response.php';
require_once __DIR__ . '/../Environment.php';
require_once __DIR__ . '/../Fields/Collection.php';

use PayPalNVP\Response\Response,
    PayPalNVP\Fields\Collection,
    PayPalNVP\Environment;

/**
 * @author pete <p.reisinger@gmail.com>
 */
final class ManageRecurringPaymentsProfileStatusResponse extends Response {

    /**
     * @var Collection
     */
    private $collection;

    private static $allowedValues = array('PROFILEID');

	public function  __construct($response, Environment $environment) {

		parent::__construct($response, $environment);
        $this->collection = new Collection(self::$allowedValues, $responseArray);
	}

	/** 
     * Recurring payments profile ID returned in the 
     * CreateRecurringPaymentsProfile response. For each action, an error is 
     * returned if the recurring payments profile has a status that is not 
     * compatible with the action. Errors are returned in the following cases: 
     *  Cancel - Profile status is not Active or Suspended. 
     *  Suspend - Profile status is not Active. 
     *  Reactivate - Profile status is not Suspended.
	 *
	 * @return string 
	 */
	public function getProfileId() {
        return $this->collection->getValue('PROFILEID');
	}

	private function  __clone() { }
}