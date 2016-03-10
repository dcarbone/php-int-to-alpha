<?php namespace DCarbone;

/*
    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.
*/

/**
 * Class IntToAlpha
 * @package DCarbone
 * @author Daniel Carbone (daniel.p.carbone@gmail.com)
 *
 * Based upon logic seen here: http://www.geeksforgeeks.org/find-excel-column-name-given-number/
 */
class IntToAlpha
{
    /** @var null|array */
    public static $_letters;

    /**
     * @param int $columnIndex
     * @return string
     */
    public function __invoke($columnIndex)
    {
        return self::invoke($columnIndex);
    }

    /**
     * @param int $columnIndex
     * @return string
     */
    public static function invoke($columnIndex)
    {
        if (!is_int($columnIndex) || $columnIndex < 1)
        {
            throw new \InvalidArgumentException(
                sprintf(
                    '%s::invoke - $columnIndex expected to be integer >= 1, %s seen.',
                    get_called_class(),
                    (is_int($columnIndex) ? $columnIndex : gettype($columnIndex))
                )
            );
        }

        // If we are in single digits...
        if ($columnIndex <= 26)
            return self::$_letters[$columnIndex];

        // Otherwise, do some stuff.

        $letter = '';

        while ((int)$columnIndex > 0)
        {
            $mod = ($columnIndex % 26);
            if (0 === $mod)
            {
                $letter = sprintf(
                    'Z%s',
                    $letter
                );
                $columnIndex = ($columnIndex / 26) - 1;
            }
            else
            {
                $letter = sprintf(
                    '%s%s',
                    self::$_letters[$mod],
                    $letter
                );
                $columnIndex /= 26;
            }
        }

        return $letter;
    }
}

IntToAlpha::$_letters = array_combine(range(1, 26), range('A', 'Z'));