<?php
echo password_hash("SCAI2025!", PASSWORD_DEFAULT);

var_dump(password_verify("SCAI2025!", '$2y$10$tmqaCwNI3wCanVvTOwywouz4JK.ZuuByDvJihOJEB0VrV9xHKsO1y'));