<?php

namespace aphproach\container\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_FUNCTION | Attribute::TARGET_METHOD)]
class Pure {

}