<?php

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
 * Class IntToAlphaTest
 */
class IntToAlphaTest extends PHPUnit_Framework_TestCase
{
    /** @var array */
    private static $_alphabet;

    /** @var array */
    private static $_testInputs = array(
        1 => 'A',
        26 => 'Z',
        27 => 'AA',
        676 => 'YZ',
        702 => 'ZZ',
        703 => 'AAA'
    );

    protected function setUp()
    {
        self::$_alphabet = array_combine(range(1, 26), range('A', 'Z'));
    }

    /**
     * @uses \DCarbone\IntToAlpha
     * @return \DCarbone\IntToAlpha
     */
    public function testCanInitialize()
    {
        $intToAlpha = new \DCarbone\IntToAlpha();
        $this->assertInstanceOf('\\DCarbone\\IntToAlpha', $intToAlpha);
        return $intToAlpha;
    }

    /**
     * @param \DCarbone\IntToAlpha $intToAlpha
     * @depends testCanInitialize
     * @covers \DCarbone\IntToAlpha::__invoke
     * @covers \DCarbone\IntToAlpha::invoke
     */
    public function testCanGetBasicAlphabet(\DCarbone\IntToAlpha $intToAlpha)
    {
        foreach(self::$_alphabet as $int=>$alpha)
        {
            $this->assertEquals($alpha, $intToAlpha($int));
        }
    }

    /**
     * @param \DCarbone\IntToAlpha $intToAlpha
     * @depends testCanInitialize
     * @covers \DCarbone\IntToAlpha::__invoke
     * @covers \DCarbone\IntToAlpha::invoke
     */
    public function testLoopWorks(\DCarbone\IntToAlpha $intToAlpha)
    {
        foreach(self::$_testInputs as $int=>$alpha)
        {
            $this->assertEquals($alpha, $intToAlpha($int));
        }
    }
}
