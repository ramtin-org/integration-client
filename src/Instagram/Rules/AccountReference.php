<?php

namespace Yaraplus\IntegrationClient\Instagram\Rules;

use Illuminate\Contracts\Validation\Rule;
use Yaraplus\IntegrationClient\Instagram\Facades\Account;

class AccountReference implements Rule
{
	public function passes($attribute, $value)
	{
		return Account::isValidUsername($value) || Account::isValidMention($value);
	}

	public function message()
	{
        return trans('instagram-integration-client::validation.account_reference');
	}
}
