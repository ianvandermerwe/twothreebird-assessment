<?php
/**
 * We consider an email address in the form user@domain.extension to be valid if its domain and extension are twothreebird.com and the value of user satisfies the following constraints:
 * - It starts with between 1 and 6 lowercase English letters denoted by the character class [a-z].
 * - The lowercase letter(s) are followed by an optional underscore, i.e. zero or one occurrence of the _ character.
 * - The optional underscore is followed by 0 to 4 optional digits denoted by the character class [0-9].
 * - Create a function with a regular expression that matches valid email addresses according to the criteria above.
 *
 * Return True for each correct match and False for each incorrect match.
 * An example of a valid email is abcdef_1234@twothreebird.com. It has as many of each class of character as possible.
 * The address a1_1@baddomain.com fails for two reasons.
 * First, digits cannot precede the underscore. Second, the domain fails because it is not twothreebird.
 */

function validateEmail($email)
{
  $pattern = '/^[a-z]{1,6}[_]?[0-9]{0,4}\Wtwothreebird\.com$/m';

  if (preg_match($pattern, $email)) {
    return true;
  }

  return false;
}

var_dump(validateEmail('abcdef_1234@twothreebird.com'));
echo '<br />';
var_dump(validateEmail('a1_1@baddomain.com'));
echo '<br />';
var_dump(validateEmail('test1234@twothreebaaird.com'));
echo '<br />';
var_dump(validateEmail('test1234@twothreebird.com'));

